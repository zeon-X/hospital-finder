// localStorage.setItem("name", "Nusrat");
// localStorage.removeItem("name");

// sessionStorage.setItem("name", "John");
// sessionStorage.setItem("name", "Nusrat");

// document.cookie = "name=Rezwana; expires" + new Date(29, 0, 1).toUTCString();

// console.log(document.cookie);

const removeLoginData = () => {
  localStorage.removeItem("user");
  alert("Logged Out Successfully");
  location.reload();
};

const headerContent = `
	<div class="container">
	<nav class="navbar navbar-expand-lg navbar-light " style="background-color: blue;">
		<div class="container-fluid">
			<div class="brand-name">
				<a href="./index.html">
					<h2 class="animated flash my-2" style="color: white;">
						<i class="fa fa-hospital"></i>&nbsp;
						Hospital finder
					</h2>
				</a>
			</div>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse"
				data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
				aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">

				</ul>
				<nav class="">
					<ul style="list-style-type: none;" class="d-flex gap-5">
						<li><a style="text-decoration: none; color:white; font-size:24px; font-weight:800"
								href="./index.html">Home</a></li>
						<li id="reg"><a style="text-decoration: none;color:white; font-size:24px; font-weight:800"
								href="./reg.html">Register</a></li>
						<li id="login"><a style="text-decoration: none; color:white; font-size:24px; font-weight:800"
								href="./login.html">Login</a></li>

						<li id="logout" class="hide"><button style="text-decoration: none; color:white; font-size:24px; font-weight:800"
								>Logout</button></li>

						<li><a style="text-decoration: none; color:white; font-size:24px; font-weight:800"
								href="./district-list.html">District
								List</a></li>

					</ul>
				</nav>
			</div>
		</div>
	</nav>
	</div>
`;

const footerContent = `
	<div class="w-75 d-flex justify-items-center mx-auto my-5">
	<a class="" style="text-decoration: none; font-size:20px; font-weight:600; color:white" href="#">All
		Right Reserved
		by mursalin Sofware company </a>

	</div>
`;

let header = document.getElementById("header");
let footer = document.getElementById("footer");

let headerDiv = document.createElement("div");
let footerDiv = document.createElement("div");

headerDiv.innerHTML = headerContent;
footerDiv.innerHTML = footerContent;

header.appendChild(headerDiv);
footer.appendChild(footerDiv);

const checkLoginData = () => {
  let data = JSON.parse(localStorage.getItem("user"));
  console.log(data);
  if (data?.email) {
    document.getElementById("reg").classList.add("hide");
    document.getElementById("login").classList.add("hide");
    document.getElementById("logout").classList.remove("hide");
  } else {
    document.getElementById("reg").classList.remove("hide");
    document.getElementById("login").classList.remove("hide");
    document.getElementById("logout").classList.add("hide");
  }
};

checkLoginData();

document.getElementById("logout").addEventListener("click", removeLoginData);
