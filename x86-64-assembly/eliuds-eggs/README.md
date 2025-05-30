# Eliud's Eggs

Welcome to Eliud's Eggs on Exercism's x86-64 Assembly Track.
If you need help running the tests or submitting your code, check out `HELP.md`.

## Introduction

Your friend Eliud inherited a farm from her grandma Tigist.
Her granny was an inventor and had a tendency to build things in an overly complicated manner.
The chicken coop has a digital display showing an encoded number representing the positions of all eggs that could be picked up.

Eliud is asking you to write a program that shows the actual number of eggs in the coop.

The position information encoding is calculated as follows:

1. Scan the potential egg-laying spots and mark down a `1` for an existing egg or a `0` for an empty spot.
2. Convert the number from binary to decimal.
3. Show the result on the display.

Example 1:

```text
Chicken Coop:
 _ _ _ _ _ _ _
|E| |E|E| | |E|

Resulting Binary:
 1 0 1 1 0 0 1

Decimal number on the display:
89

Actual eggs in the coop:
4
```

Example 2:

```text
Chicken Coop:
 _ _ _ _ _ _ _ _
| | | |E| | | | |

Resulting Binary:
 0 0 0 1 0 0 0 0

Decimal number on the display:
16

Actual eggs in the coop:
1
```

## Instructions

Your task is to count the number of 1 bits in the binary representation of a number.

## Restrictions

Keep your hands off that bit-count functionality provided by your standard library!
Solve this one yourself using other basic tools instead.

## Source

### Created by

- @keiravillekode

### Based on

Christian Willner, Eric Willigers - https://forum.exercism.org/t/new-exercise-suggestion-eliuds-eggs/7632/5