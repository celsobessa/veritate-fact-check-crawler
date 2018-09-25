=== Veritate - Fact Check Crawler ===
Contributors: celsobessa
Donate link: https://veritatecrawler.wowperations.com.br/
Tags: comments, spam
Requires at least: 4.9.4
Requires PHP: 7.1.12
Tested up to: 4.9.5
Stable tag: 40.3
License: GPLv2 or later
License URI: http://www.gnu.org/licenses/gpl-2.0.html

A under the hood plugin for managing the Veritate Fact Check [Public Index](https://veritatecrawler.wowperations.com.br/), a component of the [Veritate Initiative](https://github.com/celsobessa/veritate), an experimental project with the mission of strenghtening _fact checing_ in Brazil. Comprised by an [Crawler/Indexer](https://github.com/celsobessa/veritate/blob/master/README-EN.md#crawler-indexer), [Public Index API](https://github.com/celsobessa/veritate/blob/master/README-EN.md#public-index-api) and **Fact Check** [Aggregator/Search](https://github.com/celsobessa/veritate/blob/master/README-EN.md#aggregator-search) for Brazilian news and politics.

== Description ==

Developed by [Celso Bessa](https://www.celsobessa.com.br) with infrastructure support from [WoWPerations](https://www.wowperations.com.br), Veritate Initiative is an experimental project with the mission of strenghtening _fact checing_ in Brazil. Comprised by an [Crawler/Indexer](https://github.com/celsobessa/veritate/blob/master/README-EN.md#crawler-indexer), [Public Index API](https://github.com/celsobessa/veritate/blob/master/README-EN.md#public-index-api) and **Fact Check** [Aggregator/Search](https://github.com/celsobessa/veritate/blob/master/README-EN.md#aggregator-search) for Brazilian news and politics.

- Research, experiment, develop and spread technologies, algorithms, design patterns and best practices for the improvement of digital journalism.
- Improve access to high quality journalism
- Instigate fact checking sharing and critical thinking against _fake news_
- To offer tools for better decision making
- Instigate critical thinking and informed decisions about politics and votes

You can learn more about the initiative in the official repository at **[GitHub](https://github.com/celsobessa/veritate/)**.

== Installation ==

TODO

== Frequently Asked Questions ==

= Which fact check outlets are indexed by this initiative? =

Right now, just [Agência Lupa](http://piaui.folha.uol.com.br/lupa/), [Agência Pública](https://apublica.org/checagem/) and [Aos Fatos](https://aosfatos.org).

= How can my fact check outlet be indexed? =

You must open an issue [at the project repository](https://github.com/celsobessa/veritate/issues) with the following information

- Outlet name
- Outlet URL
- Fact Checking section URL (if different from the main URL)
- You Relationship with the oulet (reader, author, editor, publisher, etc)

You can also send an email (the address is above) with the required information.  We will index only reputable and/or trustworth outlets according to our editorial. An editorial guideline is on roadmap , but we don't know when it will be published.

In the technological side, we give priority to websites using WordPress and using the Fact Check schema in a LD+JSON markup. Our crawler and algorithms also prefer faster, accessible and secure (HTTPS) websites, specially those easily accessible by mobile phones and screenreaders.

Also, if you give express permission for our system to present content snippets from your website, the faster we will index your website and it will prioritized when presenting results.

As a rule of thumb, if it's good journalism and if is good for Google Page Speed Insights and pass the WCAG2.0 test, is good for us.

= Does this API drive traffic away from fact checking websites? =

No! On the contrary, its goals is drive MORE traffic and/or increase reach for such websites.

= Does it hurt the SEO of those sites? =

No. As an API, it just makes data accessible, but it does not count as content for search engines. And we have plans for a plugin allowing embedding and linking to fact check articles from other websites, which can drive more traffic and help with SEO.

= Does this initiative have a commercial purpose? =

No, this is a non-profit experiment. We want to make something bigger, but probably under a NGO or a Foundation like organization.

## Contributing

Coding, doing a quality assurance, testing and writing documentation. More information soon.

== Changelog ==

Please, check the CHANGELOG.md file at the [official repository](https://github.com/celsobessa/veritate-fact-check-crawler)