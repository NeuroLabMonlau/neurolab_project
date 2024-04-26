function handleLevelGameChange() {
    let rows = document.querySelectorAll('.table-rows');
    let gameId = document.querySelectorAll('.game-id').values();
    let gameIds = Array.from(gameId).map(id => id.value);
    let level = document.querySelectorAll('.level-game');

    console.log('rows: ', rows);

    console.log('gameIds: ', gameIds);

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
                let parameters = data.filter(parameter => parameter.game_id == gameId);
                let parameter = parameters.find(parameter => parameter.level == level);

                document.getElementById('max-scores').innerHTML = parameter.max_scores;
                document.getElementById('rounds-game').innerHTML = parameter.rounds;
                document.getElementById('max-errors').innerHTML = parameter.max_errors;
                document.getElementById('max-time').innerHTML = parameter.max_time || ''; 
                document.getElementById('min-time').innerHTML = parameter.min_time || '';
            });
    }
}

document.getElementById('level-game').addEventListener('change', handleLevelGameChange);