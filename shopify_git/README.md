## GMX Creative: Shopify Development
---
This Shopify toolset is designed to make collaboration easier.

### Requirements
- [Shopify Theme Kit](http://shopify.github.io/themekit/)
- Your own Shopify development store for testing
- Yarn + NodeJS + NPM + Gulp CLI

### Getting Started
1. Clone the repo
2. Copy the Shopify `config.sample.yml` file to `config.yml`
3. Edit the `development` section of the Shopify `config.yml` file and replace the **store, theme_id** and **password** values with your own development store credentials
<!-- 4. Run `chmod +x ./app` -->

### Usage
Development
```
theme watch
```
Preview Staging
```
theme -e staging open
```
Preview Production
```
theme -e production open
```

<!-- ### Deployment -->
