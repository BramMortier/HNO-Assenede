import { templateRequest } from "../../common/utils/templateRequest";
import { buildQueryString } from "../../common/utils/buildQueryString";

export function drinks() {
	return {
		loading: false,

		// async init() {
		// 	await this.renderResults();
		// },

		async renderResults() {
			this.loading = true;

			// Build query params if needed (optional)
			const queryString = buildQueryString([
				// Example: { key: "category", value: "beer" }
			]);

			const requestURL = `/requests/drinks/list?${queryString}`;
			const { content } = await templateRequest(requestURL);

			document.getElementById("drinks-results").innerHTML = content;

			this.loading = false;
		},
	};
}
