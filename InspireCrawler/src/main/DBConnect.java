package main;

import com.mongodb.MongoClient;
import com.mongodb.MongoClientURI;
import com.mongodb.client.MongoCollection;
import com.mongodb.client.MongoDatabase;
import org.bson.Document;

/**
 * Connect the Mongo DB with this class
 * @author Aulia Chairunisa
 */
public class DBConnect {

    private MongoDatabase db;

    /**
     * HOST IP, DEFAULT "localhost"
     */
    private static final String HOST = "ds023520.mlab.com";

    /**
     * HOST PORT, DEFAULT 27017
     */
    private static final int PORT = 23520;
    private static final String USER = "admin";
    private static final String PASSWORD = "admin";
    /**
     * Database's Name, change it to your Database's name
     */
    private static final String DBNAME = "inspirecrawlerdb";
    /**
     * Collection's Name, change it to your collection's name
     */
    private static final String COLNAME = "Quote";

    /**
     * Constructor for DBConnect that will connect to localhost
     */
    public DBConnect() {
         MongoClientURI mongoClientURI = new MongoClientURI(
                        "mongodb://"+
                            USER +
                        ":"+
                            PASSWORD +
                        "@" +
                            HOST +
                        ":" + PORT + "/" +
                        DBNAME
        );

         db = (new MongoClient(mongoClientURI)).getDatabase(DBNAME);
    }

    /**
     * Put the quote into mongodb
     * @param fullQuote the quote that want to be inputed
     */
    public void putData(Quote fullQuote) {
        MongoCollection<Document> dBCollection = db.getCollection(COLNAME);
        dBCollection.insertOne(
                new Document("quote", fullQuote.getQuote())
                        .append("author", fullQuote.getAuthor())
                        .append("category", fullQuote.getCategory())
                        .append("language", fullQuote.getLanguage())
                        .append("source", fullQuote.getSource())
        );
    }
}
