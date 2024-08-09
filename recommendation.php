<?php

$trips = [
    ['id' => 1, 'tags' => ['beautiful', 'hot', 'sunny']],
    ['id' => 2, 'tags' => ['cold', 'beautiful']],
    ['id' => 3, 'tags' => ['sunny', 'hot']],
    ['id' => 4, 'tags' => ['cold', 'snowy']],
];

$userVisitedTrips = [1, 3]; // User has visited trips with IDs 1 and 3

// Collect user tags from visited trips
$userTags = [];
foreach ($trips as $trip) {
    if (in_array($trip['id'], $userVisitedTrips)) {
        $userTags = array_merge($userTags, $trip['tags']);
    }
}
$userTags = array_unique($userTags); // Remove duplicates

// Filter trips based on user tags
function filterTripsByUserTags($trips, $userTags, $visitedTrips) {
    $filteredTrips = [];

    foreach ($trips as $trip) {
        if (in_array($trip['id'], $visitedTrips)) {
            continue; // Skip trips already visited
        }

        // Check if the trip contains any of the user’s tags
        $containsUserTags = !empty(array_intersect($userTags, $trip['tags']));

        if ($containsUserTags) {
            $filteredTrips[$trip['id']] = $trip['tags'];
        }
    }

    return $filteredTrips;
}

// Recommend trips based on user tags
function recommendTrips($trips, $userTags, $visitedTrips) {
    $filteredTrips = filterTripsByUserTags($trips, $userTags, $visitedTrips);
    $recommendations = [];

    foreach ($filteredTrips as $tripId => $tags) {
        $similarity = calculateTagSimilarity($userTags, $tags);
        $recommendations[$tripId] = $similarity;
    }

    arsort($recommendations); // Sort by similarity in descending order
    return array_keys($recommendations); // Trip IDs sorted by similarity
}

function calculateTagSimilarity($tags1, $tags2) {
    $commonTags = array_intersect($tags1, $tags2);
    return count($commonTags) / (count($tags1) + count($tags2) - count($commonTags));
}

// Get recommendations for the user
$recommendations = recommendTrips($trips, $userTags, $userVisitedTrips);
print_r($recommendations);

// Print recommended trips details
foreach ($recommendations as $recommendationId) {
    foreach ($trips as $trip) {
        if ($trip['id'] == $recommendationId) {
            print_r($trip);
            break; // Stop the inner loop once the trip is found
        }
    }
}
