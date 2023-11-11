document.addEventListener('DOMContentLoaded', function () {
    fetch('get_leaderboard.php')
        .then(response => response.json())
        .then(data => {
            populateLeaderboard(data);
        });
});

function populateLeaderboard(data) {
    const leaderboardTable = document.getElementById('leaderboardData');
    leaderboardTable.innerHTML = '';

    data.forEach((entry, index) => {
        const row = leaderboardTable.insertRow();
        row.insertCell(0).textContent = index + 1;
        const imageCell = row.insertCell(1);
        const image = document.createElement('img');
        image.src = entry.image;
        imageCell.appendChild(image);
        row.insertCell(2).textContent = entry.name;
        row.insertCell(3).textContent = entry.score;
    });
}

function sortLeaderboard() {
    fetch('get_leaderboard.php')
        .then(response => response.json())
        .then(data => {
            data.sort((a, b) => b.score - a.score);
            populateLeaderboard(data);
        });
}
