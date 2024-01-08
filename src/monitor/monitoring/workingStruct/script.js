function generateWorkout() {
    const exerciseSelection = document.getElementById('exerciseSelection').value;
    const intensity = document.getElementById('intensity').value;
    const progression = document.getElementById('progression').value;
    const frequency = document.getElementById('frequency').value;

    const workoutPlan = `
        <p><strong>Exercise Selection:</strong> ${exerciseSelection}</p>
        <p><strong>Intensity:</strong> ${intensity}/10</p>
        <p><strong>Progression:</strong> ${progression}</p>
        <p><strong>Frequency:</strong> ${frequency} days/week</p>
    `;

    displayWorkoutPlan(workoutPlan);
}

function updateIntensityOutput(value) {
    document.getElementById('intensityOutput').textContent = value;
}

function displayWorkoutPlan(workoutPlan) {
    const workoutPlanContainer = document.getElementById('workoutPlanContainer');
    const workoutPlanElement = document.getElementById('workoutPlan');

    workoutPlanElement.innerHTML = workoutPlan;
    workoutPlanContainer.classList.remove('hidden');
}

// Update intensity output in real-time
document.getElementById('intensity').addEventListener('input', function () {
    updateIntensityOutput(this.value);
});
