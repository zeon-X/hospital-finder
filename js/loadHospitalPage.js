let urlParams = new URLSearchParams(window.location.search);
let hospitalName = urlParams.get("name");
let hospitalId = urlParams.get("id");
let districtId = urlParams.get("did");
let districtName = "";

// console.log(hospitalId, hospitalName, districtId);

fetch("./json/main.json")
  .then((res) => {
    return res.json();
  })
  .then((d) => {
    let disData = d?.find((x) => x?.id == districtId);
    if (!disData) {
      disData = d?.find(
        (x) => x?.district_name.toLowerCase() == districtId.toLowerCase()
      );
    }
    districtName = disData?.district_name;
    let data = disData?.hospitals?.find((x) => x?.id == hospitalId);

    console.log(d);

    let servicesData = data.details.services.services_data;
    loadServices(servicesData);
    let doctorsData = data.details.doctors.doctors_data;
    loadDoctors(doctorsData);

    loadCoverAndAbout(
      data.details.details_cover_image,
      data.details.about.about_img,
      data.details.about.about_details
    );

    loadBasic(data);
  })
  .catch((err) => {
    console.log("error" + err);
  });

// FUCNCTIONS
const loadBasic = (data) => {
  let contact_image = document.getElementById("contact_image");
  let hos_name = document.getElementById("hos_name");
  let hos_mobile = document.getElementById("hos_mobile");
  let hos_email = document.getElementById("hos_email");
  let hos_district = document.getElementById("hos_district");
  let hos_address = document.getElementById("hos_address");

  let conct_add = document.getElementById("conct_add");
  let conct_email = document.getElementById("conct_email");
  let conct_phone = document.getElementById("conct_phone");

  contact_image.src = data.details.contact.contact_img;
  hos_name.innerText = data.name;
  hos_mobile.innerText = data.details.contact.contact_details.phone;
  hos_email.innerText = data.details.contact.contact_details.email;
  hos_district.innerText = districtName;
  hos_address.innerText = data.address;

  conct_add.innerText = data.address;
  conct_email.innerText = data.details.contact.contact_details.email;
  conct_phone.innerText = data.details.contact.contact_details.phone;
};

const loadCoverAndAbout = (imgsrc, aboutImg, about) => {
  document.getElementById("aboutImages").src = aboutImg;
  document.getElementById("cover_img").src = imgsrc;

  const aboutDetails = document.getElementById("aboutDetails");
  let aboutDivText = document.createElement("div");
  aboutDivText.innerHTML = `
    <p class="h6">${about}</p>
    `;
  aboutDetails.appendChild(aboutDivText);
};

const loadServices = (data) => {
  let serviceContainer = document.getElementById("serviceContainer");
  for (let i = 0; i < data.length; i++) {
    let cardDiv = document.createElement("div");
    cardDiv.innerHTML = `
        <div style="width:360px;">
            <img src="${
              data[i].servie_img
            }" width="360" height="260" class="shadow  mb-4">
            <p style="font-size: medium;">${data[i].service_moto}</p>
            <p style="font-size: medium;" class="fw-bold my-2">${
              data[i].service_name
            }</p>
            <p style="font-size: medium;">${data[i].service_details.slice(
              0,
              60
            )}</p>
        </div>
          `;
    serviceContainer.appendChild(cardDiv);
  }
};

const loadDoctors = (data) => {
  let doctorsContainer = document.getElementById("doctorsContainer");
  let floatingSelectDoc = document.getElementById("floatingSelectDoc");

  for (let i = 0; i < data.length; i++) {
    let cardDiv = document.createElement("div");
    cardDiv.innerHTML = `
        <div style="width:280px;" class="d-flex flex-column justify-content-center align-items-center border p-3 ">
            <img src="${data[i].doctor_img}" style="width:200px; height"260px" class=" mb-4">
            <p style="font-size: medium;" class="text-center">${data[i].doctor_specialization}</p>
            <p style="font-size: medium;" class="fw-bold my-2 text-center">${data[i].doctor_name}</p>
            <p style="font-size: medium;" class="text-center">${data[i].doctor_details}</p>
        </div>
          `;
    doctorsContainer.appendChild(cardDiv);

    let option = document.createElement("option");
    option.value = data[i].doctor_name;
    option.textContent = data[i].doctor_name;
    floatingSelectDoc.appendChild(option);
  }
};
