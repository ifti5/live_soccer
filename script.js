document.addEventListener('DOMContentLoaded', () => {
    const scoresDiv = document.getElementById('scores');

    const apiKey = '3d193373e2mshdada95b337c316fp1a8b48jsn48ee418a96bc'; // Replace 'YOUR_API_KEY' with your actual API key from Football Data API

    // Make API call to get live scores
    fetch('https://football-prediction-api.p.rapidapi.com', {
        headers: {
            'X-Auth-Token': apiKey
        }
    })
        .then(response => response.json())
        .then(data => {
            // Process the received data and display scores
            data.matches.forEach(match => {
                const matchElement = document.createElement('div');
                matchElement.classList.add('match');
                matchElement.innerHTML = `
                    <h2>${match.homeTeam.name} vs ${match.awayTeam.name}</h2>
                    <p>Status: ${match.status}</p>
                    <p>Score: ${match.score.fullTime.homeTeam} - ${match.score.fullTime.awayTeam}</p>
                `;
                scoresDiv.appendChild(matchElement);
            });
        })
        .catch(error => {
            console.error('Error fetching live scores:', error);
            scoresDiv.textContent = 'Error fetching live scores.';
        });
});
