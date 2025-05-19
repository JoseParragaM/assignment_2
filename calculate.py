#dev branch
import sys
import json
from datetime import datetime

a = float(sys.argv[1])
b = float(sys.argv[2])
c = float(sys.argv[3])

c_cubed = c**3
sqrt_c3 = c_cubed**0.5
divided = sqrt_c3 / a
multiplied = divided * 10
result = multiplied + b

timestamp = datetime.now().strftime("%Y-%m-%d %H:%M:%S")
info = {
    "a": a,
    "b": b,
    "c": c,
    "c_cubed": c_cubed,
    "sqrt_c3": sqrt_c3,
    "divided": divided,
    "multiplied": multiplied,
    "result": result,
    "timestamp": timestamp
}

print(json.dumps(info))