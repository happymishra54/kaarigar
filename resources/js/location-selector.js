import { State, City } from "country-state-city";

window.initLocationSelector = function (
    stateId,
    cityId,
    selectedState = "",
    selectedCity = ""
) {

    const stateSelect = document.getElementById(stateId);
    const citySelect = document.getElementById(cityId);

    if (!stateSelect || !citySelect) return;

    stateSelect.innerHTML =
        '<option value="">Select State</option>';

    const states = State.getStatesOfCountry("IN");

    states.forEach(state => {

        stateSelect.innerHTML +=
            `<option value="${state.name}" data-code="${state.isoCode}">
                ${state.name}
            </option>`;

    });

    if (selectedState) {
        stateSelect.value = selectedState;
    }

    loadCities();

    stateSelect.addEventListener("change", loadCities);

    function loadCities() {

        citySelect.innerHTML =
            '<option value="">Select City</option>';

        const option =
            stateSelect.options[stateSelect.selectedIndex];

        if (!option.dataset.code) return;

        const cities = City.getCitiesOfState(
            "IN",
            option.dataset.code
        );

        cities.forEach(city => {

            citySelect.innerHTML +=
                `<option value="${city.name}">
                    ${city.name}
                </option>`;

        });

        if (selectedCity) {
            citySelect.value = selectedCity;
        }

    }

}