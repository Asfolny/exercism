class Luhn:
    def __init__(self, card_num):
        self.card_num = card_num

    def valid(self):
        # Only numbers and spaces are allowed
        insanity = [num for num in self.card_num if not num.isnumeric() and num != ' ']
        if len(insanity) > 0:
            return False
            
        nums = [int(num) for num in self.card_num if num.isnumeric()]
        if len(nums) < 2:
            return False

        nums, last = nums[:-1], nums[-1]
        nums = list(reversed(nums))
        for i in range(0, len(nums), 2):
            dub = nums[i] * 2
            if dub > 9:
                dub -= 9
            nums[i] = dub
        return (sum(nums) + last) % 10 == 0