export const buildQueryString = (params) => {
	return params
		.filter(({ value }) => value !== null && value !== "" && value !== undefined)
		.map(({ key, value }) => `${encodeURIComponent(key)}=${encodeURIComponent(value)}`)
		.join("&");
};
