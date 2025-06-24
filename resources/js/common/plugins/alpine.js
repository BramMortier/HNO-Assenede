import Alpine from "alpinejs";

import { site } from "../components";

window.Alpine = Alpine;

Alpine.data("site", site);

Alpine.start();
