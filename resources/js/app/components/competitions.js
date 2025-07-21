import { templateRequest } from "../../common/utils/templateRequest";
import { buildQueryString } from "../../common/utils/buildQueryString";

import { addMonths, startOfMonth, endOfMonth, format } from "date-fns";
import { nl } from "date-fns/locale";

export function competitions() {
	return {
		loading: false,
		monthOffset: 0,
		monthLabel: "",

		async init() {
			await this.renderResults();
		},

		async renderResults() {
			const { label, season, startDate, endDate } = this.getDate();

			const queryString = buildQueryString([
				{ key: "season", value: season },
				{ key: "start-date", value: startDate },
				{ key: "end-date", value: endDate },
			]);

			const requestURL = `/requests/competitions/filteredList?${queryString}`;
			const { content } = await templateRequest(requestURL);

			document.getElementById("competition-results").innerHTML = content;
			document.getElementById("competitions-date-range-label").textContent = label;
			document.getElementById("competitions-date-range-season").textContent = `seizoen ${season}`;
		},

		async renderPreviousMonth() {
			this.monthOffset--;
			await this.renderResults();
		},

		async renderNextMonth() {
			this.monthOffset++;
			await this.renderResults();
		},

		getDate() {
			const baseDate = addMonths(new Date(), this.monthOffset);
			const start = startOfMonth(baseDate);
			const end = endOfMonth(baseDate);
			const monthName = format(baseDate, "LLLL", { locale: nl });
			const seasonYear = format(baseDate, "yyyy");

			this.monthLabel = monthName;

			return {
				season: seasonYear,
				label: monthName,
				startDate: format(start, "yyyy-MM-dd"),
				endDate: format(end, "yyyy-MM-dd"),
			};
		},
	};
}
