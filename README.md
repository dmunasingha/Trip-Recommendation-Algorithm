# Trip Recommendation System

## Overview

This PHP-based Trip Recommendation System suggests new trips to users based on the tags of trips they have previously visited. The system filters out trips with tags not associated with the user’s known preferences and avoids recommending trips that the user has already visited.

## Features

- **Tag-Based Recommendations**: Recommends trips based on tags from trips the user has visited.
- **Excludes Visited Trips**: Avoids recommending trips the user has already visited.
- **Customizable**: Easily modify the list of trips and user data.

## Requirements

- PHP 7.0 or higher
- Basic knowledge of PHP

## Installation

1. **Clone the Repository**

   ```bash
   git clone https://github.com/dmunasingha/Trip-Recommendation-Algorithm
   cd Trip-Recommendation-Algorithm
   ```

2. **Set Up Your Environment**

   Ensure PHP is installed and configured on your system. No additional packages are required beyond PHP.

## Usage

1. **Define Your Trips**

   Edit the `$trips` array in `recommendation.php` to include your trips data. Each trip should have an `id` and a list of `tags`.

   ```php
   $trips = [
       ['id' => 1, 'tags' => ['beautiful', 'hot', 'sunny']],
       ['id' => 2, 'tags' => ['cold', 'beautiful']],
       ['id' => 3, 'tags' => ['sunny', 'hot']],
       ['id' => 4, 'tags' => ['cold', 'snowy']],
   ];
   ```

2. **Set User Visits**

   Update the `$userVisitedTrips` array with the IDs of trips the user has visited.

   ```php
   $userVisitedTrips = [1, 3];
   ```

3. **Run the Script**

   Execute the PHP script from the command line:

   ```bash
   php recommendation.php
   ```

4. **View Recommendations**

   The script will output recommended trip IDs and details based on the tags of trips the user has previously visited.

## Functions

- **`calculateTagSimilarity($tags1, $tags2)`**: Computes similarity between two sets of tags.
- **`filterTripsByUserTags($trips, $userTags, $visitedTrips)`**: Filters trips based on user tags and excludes visited trips.
- **`recommendTrips($trips, $userTags, $visitedTrips)`**: Generates recommendations by calculating tag similarity and excluding visited trips.

## Example Output

```php
Array
(
    [0] => 2
    [1] => 4
)
Array
(
    [id] => 2
    [tags] => Array
        (
            [0] => cold
            [1] => beautiful
        )
)
Array
(
    [id] => 4
    [tags] => Array
        (
            [0] => cold
            [1] => snowy
        )
)
```

## Contribution

Feel free to contribute to this project by submitting issues or pull requests. Please ensure to follow the code of conduct and contribution guidelines.

## License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## Contact

For any inquiries, please contact [dunix00@gmail.com](mailto:dunix00@gmail.com).

---
