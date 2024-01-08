<?php

class WorkoutPlanner
{
    public function generateWorkout($exerciseSelection, $intensity, $progression, $frequency)
    {
        $workoutPlan = [
            'exerciseSelection' => $exerciseSelection,
            'intensity' => $intensity,
            'progression' => $progression,
            'frequency' => $frequency
        ];

        return $workoutPlan;
    }
}

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $exerciseSelection = $_POST['exerciseSelection'];
    $intensity = $_POST['intensity'];
    $progression = $_POST['progression'];
    $frequency = $_POST['frequency'];

    $workoutPlanner = new WorkoutPlanner();
    $generatedWorkout = $workoutPlanner->generateWorkout($exerciseSelection, $intensity, $progression, $frequency);

    header('Content-Type: application/json');
    echo json_encode($generatedWorkout);
}
?>
