import ViteRestart from "vite-plugin-restart";
import legacy from "@vitejs/plugin-legacy";
import { defineConfig, loadEnv } from "vite";

const HTTP_PORT = 3000;
const HTTPS_PORT = 3001;

export default defineConfig(({ command, mode }) => {
	const env = loadEnv(mode, process.cwd(), "");

	return {
		base: command === "serve" ? "" : "/dist/",
		build: {
			outDir: "./web/dist/",
			manifest: true,
			emptyOutDir: true,
			rollupOptions: {
				input: [
					"./resources/js/common.js",
					"./resources/js/app.js",
					"./resources/js/admin.js",
					"./resources/scss/common.scss",
					"./resources/scss/app.scss",
					"./resources/scss/admin.scss",
					"./resources/scss/login.scss",
				],
				output: {
					assetFileNames: (entry) => {
						if (entry.name === "login.css") return entry.name;
						return `[name].[hash].[ext]`;
					},
				},
			},
		},
		plugins: [
			legacy({
				targets: ["defaults", "not IE 11"],
			}),
			ViteRestart({
				reload: ["./templates/**/*", "./resources/scss/**/*"],
			}),
		],
		server: {
			origin: env.PRIMARY_SITE_URL + ":" + HTTPS_PORT,
			port: HTTP_PORT,
			strictPort: true,
			host: "0.0.0.0",
			cors: true,
		},
	};
});
