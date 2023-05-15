fetch("./json/main.json")
  .then((res) => {
    return res.json();
  })
  .then((d) => {
    loadDistricts(d);
    console.log(d);
  })
  .catch((error) => {
    console.log("error");
    console.log(error);
  });

const loadDistricts = (data) => {
  // console.log(data);
  let districtContainer = document.getElementById("districtContainer");
  for (let i = 0; i < data.length; i++) {
    // console.log(data[i]);
    let districtDiv = document.createElement("div");
    districtDiv.innerHTML = `
      <div style="width: 360px;" class="">
          <img src="${data[i].district_image}" width="100%" height="280px" class="rounded" alt="" />
          <p class="h5 fw-bold mt-3">${data[i].district_name}</p>
          <div class="d-flex justify-content-between align-items-center">
              <p class="h6">Hospital Founded: ${data[i].hospitals.length}</p>
              <a class="h6" href="./hospital-lists.html?d_name=${data[i].district_name}&d_id=${data[i].id}">View Hospitals</a>
          </div>
      </div>
      `;
    districtContainer.appendChild(districtDiv);
  }
};
