export const templateRequest = async (url) => {
	const response = await fetch(url);
	const text = await response.text();

	const parser = new DOMParser();
	const html = parser.parseFromString(text, "text/html");
	const content = html.body.innerHTML;

	return { html, content };
};
