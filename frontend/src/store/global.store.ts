import { defineStore } from "pinia";
import {
  GeneratableModule,
  ModuleDimensions,
  ModulePosition,
} from "../types/module.types";
import { inject, ref } from "vue";
import { httpServiceToken } from "../types/injection-tokens";
import { IHttpService } from "../types/http.types";

export const useGlobalStore = defineStore("global", () => {
  const module = ref<GeneratableModule>(GeneratableModule.Background);
  const content = ref<string>("Lorem ipsum");
  const clickout = ref<string>("https://appverk.com");
  const color = ref<string>("#ff9b00");
  const dimensions = ref<ModuleDimensions>({
    width: 100,
    height: 100,
  });
  const position = ref<ModulePosition>({
    top: 0,
    left: 0,
  });

  const httpService = inject(httpServiceToken) as IHttpService;

  function generateFiles() {
    httpService
      .post(
        "generate-files",
        {
          module: module.value,
          content: module.value === GeneratableModule.Typo && content.value,
          clickout: clickout.value,
          dimensions: dimensions.value,
          position: position.value,
          color: module.value === GeneratableModule.Background && color.value,
        },
        { headers: { Accept: "application/blob" } }
      )
      .then((response: Response) => response.blob())
      .then((blob: Blob) => {
        if (blob) {
          const url = window.URL.createObjectURL(blob);
          const a = document.createElement("a");
          a.href = url;

          a.click();
        }
      });
  }

  return {
    module,
    clickout,
    content,
    dimensions,
    color,
    position,
    generateFiles,
  };
});
