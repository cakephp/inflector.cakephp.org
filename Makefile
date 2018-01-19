.PHONY: web

.PHONY: all
all: help ## outputs the help message

.PHONY: help
help: ## this help message
    @grep -h -E '^[a-zA-Z_-]+:.*?## .*$$' $(MAKEFILE_LIST) | sort | awk 'BEGIN {FS = ":.*?## "}; {printf "\033[36m%-36s\033[0m %s\n", $$1, $$2}'

web: ## starts a web process
    bin/cake server -p $(PORT)
