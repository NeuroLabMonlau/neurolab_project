document.getElementById('game_id').addEventListener('change', function () {
    let gameId = document.getElementById('game_id').value;
    let levelSelect = document.getElementById('level');

    levelSelect.innerHTML = '<option value="">Selecciona un nivel</option>';
    document.getElementById('max_scores').value = '';
    document.getElementById('rounds').value = '';
    document.getElementById('max_errors').value = '';
    document.getElementById('max_time').value = ''; 
    document.getElementById('min_time').value = '';


    const levelDifficultyMap = {
        1: 'Fácil',
        5: 'Normal',
        10: 'Difícil'
    };

    if (gameId) {
        fetch('/api/games-parameters')
            .then(response => response.json())
            .then(data => {
                let parameters = data.filter(parameter => parameter.game_id == gameId);

                parameters.forEach(parameter => {
                    let option = document.createElement('option');
                    option.value = parameter.level;
                    option.text = levelDifficultyMap[parameter.level];
                    levelSelect.appendChild(option);
                });
            });
    }
});

document.getElementById('level').addEventListener('change', function () {
    let gameId = document.getElementById('game_id').value;
    let level = document.getElementById('level').value;
    document.getElementById('max_scores').value = '';
    document.getElementById('rounds').value = '';
    document.getElementById('max_errors').value = '';
    document.getElementById('max_time').value = ''; 
    document.getElementById('min_time').value = '';

    if (gameId && level) {
        fetch(`/api/games-parameters`)
            .then(response => response.json())
            .then(data => {
                let parameters = data.filter(parameter => parameter.game_id == gameId);
                let parameter = parameters.find(parameter => parameter.level == level);

                document.getElementById('max_scores').value = parameter.max_scores;
                document.getElementById('rounds').value = parameter.rounds;
                document.getElementById('max_errors').value = parameter.max_errors;
                document.getElementById('max_time').value = parameter.max_time || ''; 
                document.getElementById('min_time').value = parameter.min_time || '';
            });
    }
});