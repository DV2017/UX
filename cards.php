<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

<style>

.grid {
    display: grid;
    grid-template-columns: 1fr 1fr 1fr 1fr 1fr;
    grid-gap: 30px;
    align-items: start;
}
.grid > article {
    border: 1px solid #ccc;
    box-shadow: 2px 2px 6px 0px rgba(0, 0, 0, 0.3);
}
.grid > article img {
    max-width: 100%;
}
.text {
    padding: 0 20px 20px;
    text-align: center;
}
.text > button {
    background-color: grey;
    border: 0;
    color: white;
    padding: 10px;
    width: 100%;
}

</style>
</head>
<body>

    <div class="grid">
        <article>
            <img src="assets/images/meadowsCastricum" alt="sample photo">
            <div class="text">
                <h3>Heading goes here</h3>
                <p>Descritive short text</p>
                <button>Learn more</button>
            </div>
        </article>
        <article>
            <img src="assets/images/meadowsCastricum" alt="sample photo">
            <div class="text">
                <h3>Heading goes here</h3>
                <p>Descritive short text</p>
                <button>Learn more</button>
            </div>
        </article>
        <article>
            <img src="assets/images/meadowsCastricum" alt="sample photo">
            <div class="text">
                <h3>Heading goes here</h3>
                <p>Descritive short text</p>
                <button>Learn more</button>
            </div>
        </article>
        <article>
            <img src="assets/images/meadowsCastricum" alt="sample photo">
            <div class="text">
                <h3>Heading goes here</h3>
                <p>Descritive short text</p>
                <button>Learn more</button>
            </div>
        </article>
        <article>
            <img src="assets/images/meadowsCastricum" alt="sample photo">
            <div class="text">
                <h3>Heading goes here</h3>
                <p>Descritive short text</p>
                <button>Learn more</button>
            </div>
        </article>
        <article>
            <img src="assets/images/meadowsCastricum" alt="sample photo">
            <div class="text">
                <h3>Heading goes here</h3>
                <p>Descritive short text</p>
                <button>Learn more</button>
            </div>
        </article>
    </div>

</body>
</html>