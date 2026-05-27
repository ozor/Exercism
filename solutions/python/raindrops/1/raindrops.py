def convert(number):
    numbers = {
        3: 'Pling',
        5: 'Plang',
        7: 'Plong'
    }

    raindrop = ''
    for key in numbers:
        if number % key == 0:
            raindrop += numbers[key]

    if raindrop == '':
        raindrop = number

    return str(raindrop)
