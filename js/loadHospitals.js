const urlParams = new URLSearchParams(window.location.search);
const districtName = urlParams.get("d_name");
const districtId = urlParams.get("d_id");
// console.log(districtName);
// console.log();

fetch("./json/main.json")
  .then((res) => {
    return res.json();
  })
  .then((d) => {
    let data = d.find((x) => x.id == districtId);
    if (!data) {
      data = d.find(
        (x) => x.district_name.toLowerCase() == districtId.toLowerCase()
      );
    }
    console.log(data);
    loadHospitals(data);
  })
  .catch((err) => {
    console.log("error" + err);
  });

// FUCNCTIONS

const loadHospitals = (data) => {
  //   console.log(data);
  let hospitalContainer = document.getElementById("hospitalContainer");
  for (let i = 0; i < data?.hospitals?.length; i++) {
    // console.log(data[i]);
    let hospitalDiv = document.createElement("div");
    hospitalDiv.innerHTML = `
      <div class="card my-4  border-1 " style="width: 20rem;">
          <img src="${data?.hospitals[i]?.cover_image}" style="height:200px" class="card-img-top" alt="...">
          <div class="card-body">
              <h5 class="card-title h5 fw-bold">${data?.hospitals[i]?.name}</h5>

              <ul class="list-group list-group-flush pb-2 mx-auto">
                  <li class="list-group-item">Total Seat : ${data?.hospitals[i]?.total_seat}</li>
                  <li class="list-group-item">Available Seat: ${data?.hospitals[i]?.available_seat}</li>
                  <li class="list-group-item"> Address: ${data?.hospitals[i]?.address}
                  </li>

                  
                    <li class="list-group-item my-3 ">
                        <a href="./hospital-page.html?did=${districtId}&name=${data.hospitals[i].name}&id=${data.hospitals[i].id}" style="background-color: yellow; text-decoration: none;" >
                        See Details >>
                        </a> 
                      </li>
                  
              </ul>
          </div>

      </div>
        `;
    hospitalContainer.appendChild(hospitalDiv);
  }
};

const loadSectionTitle = (data) => {
  let hospitalListTitle = document.getElementById("hospitalListTitle");
  let titleDiv = document.createElement("div");
  titleDiv.innerHTML = `
    <h1  class="bg-light p-3">List Of Hospital, ${data}, Bangladesh</h1>
  `;
  hospitalListTitle.appendChild(titleDiv);
};

loadSectionTitle(districtName);
