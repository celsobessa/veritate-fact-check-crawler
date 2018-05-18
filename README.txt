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

A under the hood plugin for managing the Veritate Initiative fact check <a href="http://veritatecrawler.wowperations.com.br/"?Public Index</a>, a component of the <a href="https://github.com/celsobessa/veritate">Veritate Initiative</a>, <em>an experimental project</em> of a Fact Check crawler, aggregator and API focused on Brazilian news.

== Description ==

Veritate Initiative is an experimental project, a proof of concept for a fact check crawler, a public index with a REST API, and a aggregator/search engines focused on Brazilian news and politics. You can learn more about it in the [project Wiki at Github](https://github.com/celsobessa/veritate/wiki).

The project goals are:

- Investigate, study and experiment with technologia, algorhythms, UX and design patters for improve algorhythm assisted journalism.
- Improve access to high quality journalism
- Instigate fact checking sharing and critical thinking against fake news
- Instigate critical thinking and informed decisions about politics and votes

> For more information, suggestions for fact check sites or to ask for removal of content violating copyright laws, please, send an email to veritate{at}wowperations[dot]com[dot]br
> Developed by [Celso Bessa](https://www.celsobessa.com.br) with infrastructure support from [WoWPerations](https://www.wowperations.com.br)

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