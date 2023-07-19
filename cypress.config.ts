import { defineConfig } from "cypress";
import {BASE_API_URL, BASE_URL} from "./resources/js/env"

export default defineConfig({
  e2e: {
    baseUrl: BASE_URL,
    experimentalRunAllSpecs: true,
    waitForAnimations: true,
    chromeWebSecurity: false,
    setupNodeEvents(on, config) {
      // implement node event listeners here
    },
  },
});
