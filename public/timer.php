<div class="timer">
    <div class="content">
        <div class="nums bg" id="days"></div>
        <div class="nums-name">Giorni</div>
    </div>
    <div class="content">
        <div class="nums bg" id="hours"></div>
        <div class="nums-name">Ore</div>
    </div>
    <div class="content">
        <div class="nums bg" id="min"></div>
        <div class="nums-name">Minuti</div>
    </div>
    <div class="content">
        <div class="nums bg" id="sec"></div>
        <div class="nums-name">Secondi</div>
    </div>
</div>

<script>
    class F1Service {
    getInfo = async () => {
        const res = await fetch(`http://ergast.com/api/f1/${new Date().getFullYear()}.json`, {method: 'GET', redirect: 'follow'});
        return await res.json();
    }

    getAllRaces = async () => {
        const races = await this.getInfo();
        return {
            races: races.MRData.RaceTable.Races
        }
    }
}

async function main() {
    const f1 = new F1Service();

    const d = document.querySelector('#days'),
        h = document.querySelector('#hours'),
        m = document.querySelector('#min'),
        s = document.querySelector('#sec'),
        gpName = document.querySelector('#racename'),
        {races} = await f1.getAllRaces(),
        currentRaceId = getCurrentRace();

    async function updateTimer() {
        const {days, hours, minutes, seconds, raceName} = getData();

        document.querySelectorAll('.bg').forEach(elem => {
            elem.classList.remove('bg');
        })

        d.textContent = days;
        h.textContent = hours;
        m.textContent = minutes;
        s.textContent = seconds;
        gpName.textContent = raceName;
    }

    const timer = setInterval(updateTimer, 1000);

    function getCurrentRace() {
        for(let i = 0; i < races.length + 1; i++) {
            if(i == races.length) {
                return -1;
            }

            const {date, time} = races[i],
                deadline = new Date(`${date}T${time}`);

            if(Date.parse(deadline) > Date.parse(new Date())) {
                return i;
            }
        }
    }

    function getData() {
        if(currentRaceId == -1) {
            clearInterval(timer);

            return {
                days: "00",
                hours: "00",
                minutes: "00",
                seconds: "00",
                raceName: `The end of season`,
            }
        }

        const {date, time, raceName} = races[currentRaceId],
            deadline = new Date(`${date}T${time}`),
            remainTime = Date.parse(deadline) - Date.parse(new Date());

        return {
            days: addZero(Math.floor(remainTime / (1000 * 60 * 60 * 24))),
            hours: addZero(Math.floor((remainTime / (1000 * 60 * 60)) % 24)),
            minutes: addZero(Math.floor((remainTime / (1000 * 60)) % 60)),
            seconds: addZero(Math.floor((remainTime / 1000) % 60)),
            raceName: `To ${raceName} remain`,
        }
    }

    function addZero(num) {
        if(num < 10){
            return `0${num}`;
        }
        else {
            return num;
        }
    }
}

main();
</script>

<style>
@import url('https://fonts.googleapis.com/css2?family=Quicksand:wght@500;600;700&display=swap');

* {
    box-sizing: border-box;
    padding: 0;
    margin: 0;
}

html {
    font-family: 'Quicksand', sans-serif;
}

h1 {
    text-align: center;
    font-size: 35px;
    font-weight: 350;
}

.container {
    min-height: 100vh;
    display: flex;
    flex-direction: column;
    justify-content: center;
    align-items: center;
    padding: 0 20px;
    background-color: #222;
    color: #222;
}

.timer {
    width: 600px;
    height: 150px;
    background-color: #222;
    margin-top: 20px;
    padding-right: 10px;
    display: flex;
    flex-wrap: wrap;
    justify-content: space-evenly;
    align-items: center;
    border-radius: 16px;
}

.content {
    min-width: 100px;
}

.nums {
    width: 100%;
    height: 100px;
    background-color: #222;
    border-bottom: 8px solid #f10000;
    border-right: 8px solid #f10000;
    border-radius: 0 0 20px 0;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
    font-size: 24px;
    font-weight: 500;
}

.nums-name {
    color: #fff;
    font-size: 24px;
    font-weight: 600;
    text-align: center;
    margin-top: 7px;
}

.bg {
    animation-duration: 2.5s;
    animation-fill-mode: forwards;
    animation-iteration-count: infinite;
    animation-name: shimmer;
    animation-timing-function: linear;
    background: linear-gradient(to right, #222 8%, #333, #222 33%);
    background-size: 1250px 100%;
}

@keyframes shimmer {
    0% {
        background-position: -600px 0;
    }
    100% {
        background-position: 600px 0;
    }
}

@media (max-width: 600px) {
    h1 {
        font-size: 26px;
    }

    .timer {
        width: 350px;
        height: 140px;
    }

    .content {
        min-width: 70px;
    }

    .nums {
        height: 70px;
        font-size: 45px;
    }

    .nums-name {
        font-size: 16px;
    }
}

@media (max-width: 350px) {
    h1 {
        padding-left: 10px;
        text-align: left;
        font-size: 24px;
    }

    .container {
        align-items: stretch;
        padding: 0;
    }

    .timer {
        width: 360 * 0.5px;
        height: 144 * 0.5px;
        border-radius: 0 8px 8px 0;
    }

    .content {
        min-width: 72 * 0.5px;
    }

    .nums {
        height: 72px;
        font-size: 24px;
        border-radius: 0 0 10px 0;
        border-bottom: 4px solid #222;
        border-right: 4px solid #222;
    }

    .nums-name {
        font-size: 24px;
    }
}
</style>