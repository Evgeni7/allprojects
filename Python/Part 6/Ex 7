class Lunch:
    def __init__(self):
        self.customer1=Customer()
        self.employee1=Employee()
    def order(self, foodname):
        self.customer1.placeOrder(foodname, self.employee1)
    def result(self):
        self.customer1.printFood()
class Customer:
    def __init__(self):
        self.food= None
    def placeOrder(self, foodname, employee):
        self.food= employee.takeOrder(foodname)
    def printFood(self):
        print(self.food.name)
class Employee:
    def takeOrder(self, foodname):
        return Food(foodname)
class Food:
    def __init__(self, name):
        self.name = "burritos"

if __name__ == '__main__':
    x = Lunch()
    x.order('burritos')
    x.result()
