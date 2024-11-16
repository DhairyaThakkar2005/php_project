@app.route('/', methods=['GET'])
def register():
    return render_template('register.html')

if __name__ == '__main__':
    app.run(debug=True)
