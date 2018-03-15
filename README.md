# Protected Interceptors for Magento 2

With the addition of [interceptors](http://devdocs.magento.com/guides/v2.2/extension-dev-guide/plugins.html), we have a powerful tool to modify the behavior of almost any component in Magento 2.

The core developers have very good reasons to disallow interception of non-public methods. In an ideal world, we would have small classes with minimal inheritance ([composite reuse principle](https://en.wikipedia.org/wiki/Composition_over_inheritance)) with easy to modify public interfaces.
In practice, we're still often forced to use [preferences](https://alanstorm.com/magento_2_object_manager_preferences/).

This module modifies the code generator to also generate interceptors for protected methods.
That's quite probably a bad thing, and you **should not install** this at all.
But maybe you like to learn a bit more about how interception is implemented in Magento 2 and don't mind breaking things. Then go right ahead :)

## Installation

```bash
$ composer require danslo/magento2-module-protected-interceptors
```

## License

Copyright 2018 Daniel Sloof

Permission is hereby granted, free of charge, to any person obtaining a copy of this software and associated documentation files (the "Software"), to deal in the Software without restriction, including without limitation the rights to use, copy, modify, merge, publish, distribute, sublicense, and/or sell copies of the Software, and to permit persons to whom the Software is furnished to do so, subject to the following conditions:

The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN THE SOFTWARE.