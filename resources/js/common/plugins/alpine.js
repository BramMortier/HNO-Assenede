import Alpine from "alpinejs";

import * as appComponents from "../../app/components";

window.Alpine = Alpine;

Alpine.data("competitions", appComponents.competitions);
Alpine.data("drinks", appComponents.drinks)

Alpine.start();
