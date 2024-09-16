class Solution {

    /**
     * @param String[] $timePoints
     * @return Integer
     */
    function findMinDifference($timePoints) {
        // Convert times to minutes
        $minutes = [];
        foreach ($timePoints as $time) {
            list($h, $m) = explode(':', $time);
            $minutes[] = $h * 60 + $m;
        }

        // Sort times in ascending order
        sort($minutes);

        // Find minimum difference across adjacent elements
        $min_diff = INF;
        for ($i = 0; $i < count($minutes) - 1; $i++) {
            $min_diff = min($min_diff, $minutes[$i + 1] - $minutes[$i]);
        }

        // Consider the circular difference between last and first element
        $min_diff = min($min_diff, 24 * 60 - $minutes[count($minutes) - 1] + $minutes[0]);

        return $min_diff;
    }
}
