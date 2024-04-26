// Función para manejar el cambio en el select de level-game
function handleLevelGameChange() {
    let gameId = document.getElementById('game-id').value;
    let level = document.getElementById('level-game').value;

    document.getElementById('max-scores').innerHTML = '';
    document.getElementById('rounds-game').innerHTML = '';
    document.getElementById('max-errors').innerHTML = '';
    document.getElementById('max-time').innerHTML = ''; 
    document.getElementById('min-time').innerHTML = '';

    console.log('gameId: ', gameId);
    console.log('level: ', level);
    if (gameId && level) {
        fetch(`/api/games-parameters`)
            .then(response => response.json())
            .then(data => {
                console.log('data: ', data);
                let parameters = data.filter(parameter => parameter.game_id == gameId);
                console.log('parameters: ', parameters);
                let parameter = parameters.find(parameter => parameter.level == level);
                console.log('parameter: ', parameter);

                document.getElementById('max-scores').innerHTML = parameter.max_scores;
                document.getElementById('rounds-game').innerHTML = parameter.rounds;
                document.getElementById('max-errors').innerHTML = parameter.max_errors;
                document.getElementById('max-time').innerHTML = parameter.max_time || ''; 
                document.getElementById('min-time').innerHTML = parameter.min_time || '';
            });
    }
}

document.getElementById('level-game').addEventListener('change', handleLevelGameChange);