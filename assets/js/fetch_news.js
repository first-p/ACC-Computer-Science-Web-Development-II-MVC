let fetch_news = function() {
    return new Promise((resolve, reject) => {
        fetch(`https://${document.location.host}/ac/get_news`, {
            headers: {
                // 'Accept': 'application/json',
                // 'Content-Type': 'application/json',
            },
            method: "get",
        }).then(data => {
            data.json().then(resp => {console.log(resp)})
        }).catch(err => {
            resolve({error: err})
        })
    })
}

fetch_news().then(json_news => {
    console.log("json news", json_news);
    json_news.forEach(news_story => {
        let news_row = document.createElement("div")
        if (news_story.importance === "1") {
            news_row.className = "news-row important";
        } else {
            news_row.className = "news-row";
        }

        let news_title = document.createElement("div");
        news_title.className = "news-title";
        news_title.innerText = news_story.title;


        let news_body = document.createElement("div");
        news_body.className = "news-body";
        news_body.innerText = news_story.text;

        let slug_anchor = document.createElement("div")
        slug_anchor.className = "news-link";
        let anchor = document.createElement("a");
        anchor.href = `http://localhost/news/view/${news_story.slug}`;
        anchor.innerText = "View article"
        slug_anchor.appendChild(anchor);
        news_row.appendChild(news_title);
        news_row.appendChild(news_body);
        news_row.appendChild(slug_anchor);

        document.body.appendChild(news_row)
    })
});

