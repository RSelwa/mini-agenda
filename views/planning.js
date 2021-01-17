const initSelectsEvents = () => {
    const pellerSelects = [...document.getElementsByClassName('peeler-select')];

    pellerSelects.forEach(select => {
        select.addEventListener('change', event => {
            event.target.options.forEach(option => {
                if (option.value === event.target.value) {
                    event.target.style.backgroundColor = option.getAttribute("data-color");
                }
            })
        });
    });
};

/**
 * Redirects to the year's page when selecting a new year.
 */
const initYearSelectEvent = () => {
    const yearSelect = document.getElementById('year-select');
    yearSelect.addEventListener('change', event => {
        window.location = `?year=${event.target.value}`;
    });
}

initSelectsEvents();
initYearSelectEvent();