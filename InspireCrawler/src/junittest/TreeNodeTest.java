package junittest;

import main.Quote;
import main.QuoteFilter;
import main.TreeNode;

import org.junit.AfterClass;
import org.junit.Before;
import org.junit.BeforeClass;
import org.junit.Test;

import java.util.ArrayList;
import java.util.List;

import static org.junit.Assert.assertEquals;

/**
 * Created with IntelliJ IDEA.
 * User: pulpen
 * Date: 5/15/16
 * Time: 9:02 PM
 * To change this template use File | Settings | File Templates.
 */

public class TreeNodeTest {
    private TreeNode treeNode;

    @Before
    public void initialize() {
        System.out.println("TreeNode Testing Started");
        treeNode = new TreeNode();
    }

    @Test
    public void constructTC1() throws Exception {

        String parseTree = "(ROOT\\n  (NP (NNP Privacy) (NNP Policy)))";
        TreeNode expectedResult1 = new TreeNode();
        TreeNode dummyRoot = new TreeNode();

        TreeNode root = new TreeNode();
        root.setLabel("ROOT\\n");
        root.setValue("");
        root.setParent(dummyRoot);
        root.setLevel(0);

        TreeNode np = new TreeNode();
        np.setLabel("NP");
        np.setValue("");
        np.setParent(root);
        np.setLevel(1);

        TreeNode nnp1 = new TreeNode();
        nnp1.setLabel("NNP");
        nnp1.setValue("Privacy");
        nnp1.setParent(np);
        nnp1.setLevel(2);

        TreeNode nnp2 = new TreeNode();
        nnp2.setLabel("NNP");
        nnp2.setValue("Policy");
        nnp2.setParent(np);
        nnp2.setLevel(2);

        ArrayList<TreeNode> childs = new ArrayList<TreeNode>();
        childs.add(root);
        dummyRoot.setChilds(childs);

        childs.add(np);
        root.setChilds(childs);

        childs = new ArrayList<TreeNode>();
        childs.add(nnp1);
        childs.add(nnp2);
        np.setChilds(childs);

        nnp1.setChilds(null);
        nnp2.setChilds(null);

        expectedResult1 = dummyRoot;
        assertEquals(expectedResult1,treeNode.construct(parseTree));
    }




}
