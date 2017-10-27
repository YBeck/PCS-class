/*jshint -W117 */
console.log("incrementing first module");
for (var i = 0; i < 9; i++) {
    app.count.increment();
}    
console.log("increment 10 times", app.count.increment().getCount());


console.log("implementing second module");
var counter1 = app.counters.newCounter();
var counter2 = app.counters.newCounter();

for (var i = 0; i < 5; i++) {
    counter1.increment();
}    

for (var i = 0; i < 15; i++) {
    counter2.increment();
}    

console.log("counter1", counter1.getCount());
console.log("counter2", counter2.getCount());
console.log("first module", app.count.getCount());
/*jshint +W117 */
