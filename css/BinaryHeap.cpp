#include <iostream>
#include <vector>
using namespace std;

class BinaryHeap{
public:
    vector<int> data;

    int parent(int idx){

        
        
    }

    int left_child(int idx){
        
    }
    

    int right_child(int idx){
        
    }

    int num_children(int idx){
        
    }

    void push(int value){
        
    }

    void pop(){
        
    }

    void print(){
        for(auto &v : data){
            cout << v << " ";
        }
        cout << endl;
    }
};

int main()
{
    BinaryHeap bh;
    string line;
    while(getline(cin, line) && line[0] != 'x'){
        if(line[0] == 'p'){
            bh.pop();
        }
        else{
            bh.push(stoi(line));
        }
        bh.print();
    }

    return 0;
}