function generateFitnessPlan() {
    // Collect user inputs
    const userGoals = document.getElementById('userGoals').value;
    const userFitnessLevel = document.getElementById('userFitnessLevel').value;
    const healthConsiderations = document.getElementById('healthConsiderations').value;
    const availability = document.getElementById('availability').value;

    // Send user inputs to the server using AJAX
    const xhr = new XMLHttpRequest();
    xhr.open('POST', 'plan_generator.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');

    xhr.onreadystatechange = function () {
        if (xhr.readyState === 4 && xhr.status === 200) {
            // Parse the JSON response and display the fitness plan
            const fitnessPlan = JSON.parse(xhr.responseText);
            displayFitnessPlan(fitnessPlan);
        }
    };

    // Send the user inputs to the server
    xhr.send(`userGoals=${userGoals}&userFitnessLevel=${userFitnessLevel}&healthConsiderations=${healthConsiderations}&availability=${availability}`);
}

function displayFitnessPlan(fitnessPlan) {
    // Display the fitness plan on the page
    const fitnessPlanContainer = document.getElementById('fitnessPlanContainer');
    const fitnessPlanElement = document.getElementById('fitnessPlan');

    // Construct HTML based on the fitness plan (customize as needed)
    let html = '<h2>Fitness Plan:</h2>';
    html += `<p><strong>Workout Plan:</strong> ${fitnessPlan.workout_plan}</p>`;
    html += `<p><strong>Nutritional Guidelines:</strong> ${fitnessPlan.nutritional_guidelines}</p>`;
    html += `<p><strong>Motivational Support:</strong> ${fitnessPlan.motivational_support}</p>`;

    fitnessPlanElement.innerHTML = html;

    // Show the fitness plan container
    fitnessPlanContainer.classList.remove('hidden');
}
