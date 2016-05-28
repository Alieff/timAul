package test;

/**
 * Created by haryoaw on 07/04/16.
 */
import com.mongodb.MongoClient;
import com.mongodb.client.MongoDatabase;
import org.bson.Document;

import java.text.DateFormat;
import java.text.ParseException;
import java.text.SimpleDateFormat;
import java.util.Locale;

import static java.util.Arrays.asList;


public class MongokTest {
    public static void main(String argv[]) throws Exception{
            MongoClient mongoClient = new MongoClient("localhost",27017);
            MongoDatabase db = mongoClient.getDatabase("kucing");
            DateFormat format = new SimpleDateFormat("yyyy-MM-dd'T'HH:mm:ss'Z'", Locale.ENGLISH);

            db.getCollection("hehe").insertOne(
                    new Document("address",
                        new Document()
                            .append("street","2 Avenue"))
                .append("nama","gege")
                .append("cuisine","gago")
                        .append("grades", asList(
                                new Document()
                                        .append("date", format.parse("2014-10-01T00:00:00Z"))
                                        .append("grade", "A")
                                        .append("score", 11),
                                new Document()
                                        .append("date", format.parse("2014-01-16T00:00:00Z"))
                                        .append("grade", "B")
                                        .append("score", 17)))
        );

        System.out.println("Berhasil!!! Hehe");
    }
}
