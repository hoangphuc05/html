import flask
from flask import request,jsonify
import praw

#confirm reddit user
reddit = praw.Reddit(client_id='tWDMFPoWcC_BDQ',
                     client_secret='6mstJZUdzJpyOwT6quqZhKzn90A',
                     password='HoangPhuc05',
                     user_agent='pytt',
                     username='meo_rung1')


app = flask.Flask(__name__)
app.config["DEBUG"] = True

@app.route('/', methods=['GET'])
def home():

    return str(reddit.user.me())

@app.route('/api/reddit/post', methods=['GET'])
def getPost():
    rdLink = ""

    if "link" in request.args:
        rdLink= str(request.args['link'])
    else:
        return "provide link"

    submission = reddit.submission(url=rdLink)
    toReturn = {
        'user_name':"u/"+str(submission.author),
        'score':str(submission.score),
        'content':str(submission.selftext)}
        

    return toReturn
    
@app.route('/api/reddit/comments', methods=['GET'])
def getComment():
    rdLink = ""

    if "link" in request.args:
        rdLink= str(request.args['link'])
    else:
        return "provide link"

    toReturn=[]
    submission = reddit.submission(url=rdLink)
    for comment in submission.comments:
        commentList = {
            "user_name":"u/"+str(comment.author),
            'score':str(comment.score),
            'content':str(comment.body),
            'id':str(comment.id)
        }
        toReturn.append(commentList)
    return jsonify(toReturn)

@app.route('/api/reddit/subcomments', methods=['GET'])
def getSub():
    commentId = ""

    if "id" in request.args:
        commentId= str(request.args['id'])
    else:
        return "provide link"
    
    toReturn=[]
    parent = reddit.comment(commentId)
    parent.refresh()
    parent.replies.replace_more()
    replies = parent.replies.list()

    for reply in replies:
        replyList = {
            "user_name":"u/"+str(reply.author),
            'score':str(reply.score),
            'content':str(reply.body),
            'id':str(reply.id)
        }
        toReturn.append(replyList)
        
    return jsonify(toReturn)





app.run(host='0.0.0.0', port=5000)