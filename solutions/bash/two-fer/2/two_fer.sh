#!/usr/bin/env bash

main () {
  if [[ $# -ge 1 ]] ; then echo "One for $1, one for me." ; else echo "One for you, one for me." ; fi
}

main "$@"