class Allergies:

    def __init__(self, score):
        self.score = score
        self.__allergens = {
            "eggs":         0b1,
            "peanuts":      0b10,
            "shellfish":    0b100,
            "strawberries": 0b1000,
            "tomatoes":     0b10000,
            "chocolate":    0b100000,
            "pollen":       0b1000000,
            "cats":         0b10000000
        }

    def allergic_to(self, item):
        allergen = self.__allergens.get(item, 0b0)
        return self.score & allergen > 0

    @property
    def lst(self):
        allergies = []
        for allergen, value in self.__allergens.items():
            if self.score & value > 0:
                allergies.append(allergen)
        return allergies
