import Alpine from "alpinejs";

import * as components from "../components";
import * as appComponents from "../../app/components";

window.Alpine = Alpine;

Alpine.data("competitions", appComponents.competitions);

Alpine.start();
