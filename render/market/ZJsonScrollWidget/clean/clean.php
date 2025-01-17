    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    
    <style>
        .surface-container {
            max-width: 900px;
            margin: 80px auto 0;
        }

        .container {
            display: -ms-flexbox;
            display: flex;
            -ms-flex-wrap: wrap;
            flex-wrap: wrap;
            height: auto;
            margin: 50px 0;
        }

        .item {
            flex-basis: 0;
            margin-right: 32px;
            margin-bottom: 70px;
            position: relative;
            -webkit-transition: opacity .3s ease;
            -o-transition: opacity .3s ease;
            transition: opacity .3s ease;
        }

        .item__img__img {
            border: 0;
        }
        .item__img {
            border: 0;
            background: transparent url(https://placehold.co/185x278) no-repeat;
        }

        .item__rank {
            display: none;
        }

        .item__rating {
            background-color: #f0a70d;
            position: absolute;
            border-radius: 50%;
            font-size: 12px;
            width: 30px;
            height: 30px;
            line-height: 30px;
            text-align: center;
            top: 15px;
            right: -15px;
            font-weight: bold;
            -webkit-box-shadow: 0 0 3px 1px rgba(0,0,0,.4);
            box-shadow: 0 0 3px 1px rgba(0,0,0,.4);
            color: #000;
        }

        .item__title {
            display: block;
            font-size: 16px;
            padding: 0 8px;
            margin: 4px 0 0;
            text-decoration: none;
        }

        .item__year {
            display: block;
            font-size: 14px;
            color: #777;
            padding: 0 8px;
            text-decoration: none;
        }

        .item__link:hover {
            text-decoration: none;
        }

    </style>
<div class="surface-container">
    <div class="container">
        <!-- items will be inserted here by javascript -->
    </div>
</div>

<script>

    function createMovieItem(movieData) {
        const template = `<div class="item">
    <a href="${'https://www.imdb.com/title/' + movieData.imdbID}" class="item__link" target="_blank">
      <div class="item__img"><img class="item__img__img" src="${movieData.Poster}" onerror="this.src='https://placehold.co/185x278'" width="185" height="278"/></div>
      <h1 class="item__title">${movieData.Title}</h1>
      <div class="item__year">${movieData.Year}</div>
      <div class="item__rating" title="IMDB Rating">${movieData.imdbRating}</div>
    </a>
  </div>
  `;

        let item = document.createElement('div');
        item.innerHTML = template.trim();

        return item.firstChild;
    }

    function nextHandler(pageIndex) {
        return fetch('./static/movies.json')
            .then(response => response.json())
            .then((data) => {
                let frag = document.createDocumentFragment();

                let itemsPerPage = 8;
                let totalPages = Math.ceil(data.length / itemsPerPage);
                let offset = pageIndex * itemsPerPage;

                // walk over the movie items for the current page and add them to the fragment
                for (let i = offset, len = offset + itemsPerPage; i < len; i++) {
                    let movie = data[i];

                    let item = createMovieItem(movie);

                    frag.appendChild(item);
                }

                let hasNextPage = pageIndex < totalPages - 1;

                return this.append(Array.from(frag.childNodes))
                    // indicate that there is a next page to load
                    .then(() => hasNextPage);
            });
    }

  /*  window.ias = new InfiniteAjaxScroll('.container', {
        item: '.item',
        next: nextHandler,
        pagination: false,
    });*/

</script>

