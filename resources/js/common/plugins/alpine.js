import Alpine from "alpinejs";

import * as components from "../components";

window.Alpine = Alpine;

Alpine.data("loginForm", components.loginForm);

Alpine.start();
