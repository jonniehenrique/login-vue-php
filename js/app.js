var app = new Vue({
	el: '#login',
	data: {
		successMessage: "",
		errorMessage: "",
		login: {username: '', password: ''},
	},
 
	methods: {
		keymonitor: function(event) {
       		if(event.key == "Enter"){
         		app.checkLogin();
        	}
       	},
 
		checkLogin: function(){
			var loginForm = app.toFormData(app.login);

			axios.post('login.php', loginForm)
				.then(function(response) {
 
					if (response.data.error) {
						app.errorMessage = response.data.message;
					} else {
						app.successMessage = response.data.message;
						app.login = {username: '', password:''};
						setTimeout(function() {
							window.location.href = "painel.php";
						}, 2000);
					}
				});
		},
 
		toFormData: function(obj){
			var form_data = new FormData();
			for (var key in obj) {
				form_data.append(key, obj[key]);
			}
			return form_data;
		},
 
		clearMessage: function(){
			app.errorMessage = '';
			app.successMessage = '';
		}
	}
});