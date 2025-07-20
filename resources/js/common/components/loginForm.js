export function loginForm() {
	return {
		async login() {
			const response = fetch(`/actions/users/login`, {
				method: "POST",
				body: formData,
				headers: {
					Accept: "application/json",
					"X-CSRF-Token": session.csrfTokenValue,
				},
			});
		},
	};
}
